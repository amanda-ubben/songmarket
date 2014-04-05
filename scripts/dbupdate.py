#!/usr/bin/python
import MySQLdb
import urllib2
import song

songs=[]


db = MySQLdb.connect(host="localhost", # your host, usually localhost
                     user="smadmin", # your username
                      passwd="smtest", # your password
                      db="songmarket") # name of the data base

req = urllib2.Request('http://www.billboard.com/rss/charts/hot-100')
response = urllib2.urlopen(req)
the_page = response.read()

listofSongs =the_page.split('<item>')[1:]
for song in listofSongs:
    title = song.split(' ', 3)[3].split('</title>')[0].replace("&#039;", "")
    print title
    artist = song.split('<artist>')[1].split('</artist>')[0].split(" Featuring")[0].split(" &amp;")[0]
    print artist

    searchURL = "http://ws.spotify.com/search/1/track?q="+title.replace(" ", "%20")+"%20"+artist.replace(" ", "%20")
    print searchURL
    req2 = urllib2.Request(searchURL)
    response2 = urllib2.urlopen(req2)
    spotify_page = response2.read()

    track = spotify_page.split('<album', 2)[1]
    album = track.split('<name>',1)[1].split('</name>',1)[0].replace("'", "''")
    print album

    price = float(track.split('<popularity>',1)[1].split('</popularity>',1)[0])*100
    print price

    market = "Mainstream"

    cur = db.cursor()

    select = "SELECT idSong, price FROM Songs WHERE name='{0}' and artist='{1}'".format(title, artist)
    print select
    cur.execute(select)

    row = cur.fetchone()
    if row != None:
        change = price - row[1]
        update = "UPDATE Songs SET `price`='{0}', `change`='{1}', `updated`=NOW() WHERE `idSong`='{2}'".format(price, change, row[0])
        cur.execute(update)
    else:
        insert = "INSERT INTO Songs(`name`, `artist`, `album`, `market`, `price`, `change`, `updated`) VALUES ('{0}', '{1}', '{2}', '{3}', '{4}', '{5}', NOW() )".format(title, artist, album, market, price, '0' )
        cur.execute(insert)

    db.commit()

