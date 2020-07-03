<?php

use PHPUnit\Framework\TestCase;

require('vendor/autoload.php');

class tests extends TestCase
{
  public function testLennaMp4()
  {
    $file_name = "mp4files/lenna.mp4";

    $getID3 = new getID3();
    $fileinfo_vdrender = $getID3->analyze($file_name);
    $lenvdr = $fileinfo_vdrender['playtime_string'];

    $this->assertEquals("0:00", $lenvdr);
  }

  public function testJapaneseLennaMp4()
  {
    $file_name = "wfio://mp4files/レナ.mp4";

    $stream = fopen($file_name, "rb");

    $getID3 = new getID3();
    $fileinfo_vdrender = $getID3->analyze(NULL, fstat($stream)["size"], $file_name, $stream);
    $lenvdr = $fileinfo_vdrender['playtime_string'];

    $this->assertEquals("0:00", $lenvdr);
  }
}
