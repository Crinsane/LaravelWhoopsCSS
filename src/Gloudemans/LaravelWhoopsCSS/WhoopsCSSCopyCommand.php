<?php namespace Gloudemans\LaravelWhoopsCSS;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class WhoopsCSSCopyCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'whoops:copy';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Copy the custom Laravel Whoops resources to the vendor folder.';

	/**
	 * Create a new command instance.
	 *
	 * @param  Illuminate\Filesystem\Filesystem  $file
	 * @return void
	 */
	public function __construct(Filesystem $file)
	{
		parent::__construct();

		$this->file = $file;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$resourcePath = $this->getResourcePath();
		$whoopsPath = $this->getWhoopsPath();
		$resourceFilename = $this->getResourceFilename();

		$this->file->copy($resourcePath . $resourceFilename, $whoopsPath . $resourceFilename);

		$this->info('Whoops resources copied to vendor directory.');
	}

	/**
	 * Get the resources path
	 *
	 * @return string
	 */
	protected function getResourcePath()
	{
		return __DIR__ . '/Resources/';
	}

	/**
	 * Get the path for whoops resources
	 *
	 * @return string
	 */
	protected function getWhoopsPath()
	{
		return base_path() . '/vendor/filp/whoops/src/Whoops/Resources/css/';
	}

	/**
	 * Get the filename for the resource
	 *
	 * @return string
	 */
	protected function getResourceFilename()
	{
		return 'whoops.base.css';
	}

}
