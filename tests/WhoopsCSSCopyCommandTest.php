<?php

use Gloudemans\LaravelWhoopsCSS\WhoopsCSSCopyCommand;
use Symfony\Component\Console\Tester\CommandTester;

class WhoopsCSSCopyCommandTest extends PHPUnit_Framework_TestCase {

	public function tearDown()
	{
		@unlink(__DIR__ . '/tmp/whoops.base.css');
	}

	public static function tearDownAfterClass()
	{
		@rmdir(__DIR__ . '/tmp');
	}

	public static function setUpBeforeClass()
	{
		@mkdir(__DIR__ . '/tmp');
	}

	public function test_command_gives_output()
	{
		$command = new WhoopsCSSCopyCommand();
		$tester = new CommandTester($command);

		$tester->execute(['--whoopsPath' => __DIR__ . '/tmp/', '--resourcePath' => __DIR__ . '/stubs/']);

		$this->assertEquals(
			"Whoops resources copied to vendor directory.\n",
			$tester->getDisplay()
		);
	}

	public function test_command_copies_resources_to_path()
	{
		$command = new WhoopsCSSCopyCommand();
		$tester = new CommandTester($command);

		$tester->execute(['--whoopsPath' => __DIR__ . '/tmp/', '--resourcePath' => __DIR__ . '/stubs/']);

		$this->assertEquals(
			'This is the stub for the Whoops resources.',
			file_get_contents(__DIR__ . '/tmp/whoops.base.css')
		);
	}

}