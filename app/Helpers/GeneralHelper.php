<?php

if (!function_exists('change_Date_Format'))
{
	function change_Date_Format($date, $format)
	{
		return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($format);
	}
}