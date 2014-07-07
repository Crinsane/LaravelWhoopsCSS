<?php

use Gloudemans\LaravelWhoopsCSS\WhoopsCSSCopyCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Mockery as m;

class WhoopsCSSCopyCommandTest extends PHPUnit_Framework_TestCase {

	public function tearDown()
	{
		m::close();
	}

	public function test_command_gives_output()
	{
		$file = m::mock('Illuminate\Filesystem\Filesystem');
		$command = new WhoopsCSSCopyCommand($file);
		$tester = new CommandTester($command);

		$tester->execute([]);

		$this->assertEquals(
			"Whoops resources copied to vendor directory.\n",
			$tester->getDisplay()
		);
	}

}