<?php namespace KevBaldwyn\Image;

use Config;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot() {
		
		include(__DIR__.'/routes.php');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		
		Config::package('kevbaldwyn/image', __DIR__.'/../../config');

		$this->registerWorker();
		$this->registerCache();
		$this->registerImage();

		$this->registerCommands();

	}


	private function registerWorker() {

		$this->app->bind('kevbaldwyn.image.worker', function() {
			return \Imagecow\Image::create(Config::get('image::worker'));
		});

	}


	private function registerCache() {

		$this->app->bind('kevbaldwyn.image.cache', function() {
            // default cache is file
            // trying to keep image cache separate from other cache
            $config = array();
            $config['config']['cache.driver'] = 'file';
            $config['config']['cache.path'] = storage_path() . '/cache/' . Config::get('image::cache.path');
            $config['files'] = new \Illuminate\Filesystem\Filesystem;
            return new \Illuminate\Cache\CacheManager($config);
		});

	}


	private function registerImage() {

		$app = $this->app;

		$this->app->bind('kevbaldwyn.image', function() use ($app) {
			return new \KevBaldwyn\Image\Image($app['kevbaldwyn.image.worker'], 
											   $app['kevbaldwyn.image.cache'],
											   Config::get('image::cache.lifetime'),
											   Config::get('image::route'));
		});

	}


	private function registerCommands() {

		$this->app['command.kevbaldwyn.image.moveasset'] = $this->app->share(function($app) {
			return new Commands\MoveAssetCommand();
		});
				
		$this->commands('command.kevbaldwyn.image.moveasset');
	}


	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('kevbaldwyn.image');
	}

}