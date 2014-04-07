#!/usr/bin/python
# -*- coding: UTF-8 -*-

import MySQLdb
import urllib2
import song
import unicodedata

#################################################
# TO-DO: Remove special characters from strings
#################################################
def remove_accents(data):
    return ''.join(x for x in unicodedata.normalize('NFKD', data) if x in string.ascii_letters).lower()

def remove_diacritic(input):
    '''
    Accept a unicode string, and return a normal string (bytes in Python 3)
    without any diacritical marks.
    '''
    return unicodedata.normalize('NFKD', input).encode('ASCII', 'ignore')
#################################################

songs=[]

db = MySQLdb.connect(host="localhost", # your host, usually localhost
                     user="smadmin", # your username
                      passwd="smtest", # your password
                      db="songmarket") # name of the data base

#################################################
# Grab a list of songs&artists from a website
#################################################

# req = urllib2.Request('http://www.billboard.com/rss/charts/hot-100')
# response = urllib2.urlopen(req)
# the_page = response.read()

req = urllib2.Request('http://ws.spotify.com/search/1/track?q=genre:pop')
response = urllib2.urlopen(req)
the_page = response.read()

#################################################
# Parse web data for the song/artist name
#################################################
# listofSongs =the_page.split('<item>')[1:30]
listofSongs =the_page.split('<track ')[1:]
for song in listofSongs:
    # title = song.split(' ', 3)[3].split('</title>')[0].replace("&#039;", "")
    title = song.split('<name>')[1].split('</name>')[0].split(" - ")[0].split(" (From")[0].split(" [")[0].split(" (")[0].replace("'", "")
    print title
    # artist = song.split('<artist>')[1].split('</artist>')[0].split(" Featuring")[0].split(" &amp;")[0]
    artist = song.split('<name>')[2].split('</name>')[0].split(" Featuring")[0].split(" &amp;")[0].replace("ë", "e").encode('ASCII', 'ignore')
    print artist

    #################################################
    # Search spotify for popularity and album
    #################################################

    searchURL = "http://ws.spotify.com/search/1/track?q="+title.replace(" ", "%20")+"%20"+artist.replace(" ", "%20")
    print searchURL
    req2 = urllib2.Request(searchURL)
    response2 = urllib2.urlopen(req2)
    spotify_page = response2.read()

    track = spotify_page.split('<album', 2)[1]
    album = track.split('<name>',1)[1].split('</name>',1)[0].split(" [")[0].replace("'", "''")
    print album

    price = float(track.split('<popularity>',1)[1].split('</popularity>',1)[0])*100
    print price

    market = "Mainstream"

    cur = db.cursor()

    select = "SELECT idSong, price FROM Songs WHERE name='{0}' and artist='{1}'".format(title, artist)
    print select
    cur.execute(select)

    row = cur.fetchone()

    #################################################
    # Populate database
    #################################################
    if row != None:
        change = price - row[1]
        update = "UPDATE Songs SET `price`='{0}', `change`='{1}', `updated`=NOW() WHERE `idSong`='{2}'".format(price, change, row[0])
        print update
        cur.execute(update)
        log = "INSERT INTO Histories(`idSong`, `price`, `changedValue`, `lastUpdate`) VALUES ('{0}', '{1}', '{2}', NOW())".format(row[0], price, change)
        print log
        cur.execute(log)
    else:
        insert = "INSERT INTO Songs(`name`, `artist`, `album`, `market`, `price`, `change`, `updated`) VALUES ('{0}', '{1}', '{2}', '{3}', '{4}', '{5}', NOW() )".format(title, artist, album, market, price, '0' )
        cur.execute(insert)
        select = "SELECT idSong FROM Songs WHERE name='{0}' and artist='{1}'".format(title, artist)
        print select
        cur.execute(select)
        row = cur.fetchone()
        log = "INSERT INTO Histories(`idSong`, `price`, `changedValue`, `lastUpdate`) VALUES ('{0}', '{1}', '{2}', NOW())".format(row[0], price, 0)
        print log
        cur.execute(log)

    db.commit()

