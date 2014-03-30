<?php // viewall.php
include_once 'header.php';
echo "<div class='main'>";

$booklist=array();
$result = queryMysql("SELECT DISTINCT title FROM booklist");
$num = mysql_num_rows($result);
for ($j = 0; $j < $num; ++$j)
{
	$row = mysql_fetch_row($result);
	$booklist[$j] = $row[0];
}
if (sizeof($booklist))
{
	echo "<span class='subhead'>The Ultimate Booklist</span><ul>";
	foreach($booklist as $book)
		echo "<li>$book";
	echo "</ul>";
}

?>
</div></body></html>
