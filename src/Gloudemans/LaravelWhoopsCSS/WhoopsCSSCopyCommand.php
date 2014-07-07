<?php namespace Gloudemans\LaravelWhoopsCSS;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

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
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
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

		copy($resourcePath . $resourceFilename, $whoopsPath . $resourceFilename);

		$this->info('Whoops resources copied to vendor directory.');
	}

	/**
	 * Get the resources path
	 *
	 * @return string
	 */
	protected function getResourcePath()
	{
		$path = $this->option('resourcePath');

		if( ! empty($path))
			return $this->option('resourcePath');

		return __DIR__ . '/Resources/';
	}

	/**
	 * Get the path for whoops resources
	 *
	 * @return string
	 */
	protected function getWhoopsPath()
	{
		$path = $this->option('whoopsPath');

		if( ! empty($path))
			return $this->option('whoopsPath');

		return base_path('/vendor/filp/whoops/src/Whoops/Resources/css/');
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

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['resourcePath', null, InputOption::VALUE_OPTIONAL, 'The resource path.', null],
			['whoopsPath', null, InputOption::VALUE_OPTIONAL, 'The whoops path.', null]
		];
	}

}
