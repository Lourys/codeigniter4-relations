<?php namespace Tests\Support;

use CodeIgniter\Config\Services;
use CodeIgniter\Test\CIDatabaseTestCase;
use Tatter\Schemas\Drafter\Handlers\DatabaseHandler;

class DatabaseTestCase extends CIDatabaseTestCase
{
	/**
	 * Should the database be refreshed before each test?
	 *
	 * @var boolean
	 */
	protected $refresh = true;

	/**
	 * The name of a seed file used for all tests within this test case.
	 *
	 * @var string
	 */
	protected $seed = 'Tests\Support\Database\Seeds\TestSeeder';

	/**
	 * The path to where we can find the test Seeds directory.
	 *
	 * @var string
	 */
	protected $basePath = SUPPORTPATH . 'Database/';

	/**
	 * The namespace to help us find the migration classes.
	 *
	 * @var string
	 */
	protected $namespace = 'Tests\Support';

	public function setUp(): void
	{
		parent::setUp();

		cache()->clean();

		// Configure and inject the Schemas service
		$config         = new \Tatter\Schemas\Config\Schemas();
		$config->silent = false;
		$config->ignoredNamespaces = [];
		
		$schemas = new \Tatter\Schemas\Schemas($config);
        Services::injectMock('schemas', $schemas);
	}
}
