<?php
if(!mysql_connect("","www",""))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("biolei"))
{
     die('oops database selection problem ! --> '.mysql_error());
}

?>