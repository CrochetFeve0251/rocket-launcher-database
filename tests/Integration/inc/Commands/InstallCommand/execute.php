<?php

namespace LaunchpadBerlinDB\Tests\Integration\inc\Commands\InstallCommand;

use LaunchpadBerlinDB\Tests\Integration\TestCase;

class Test_Execute extends TestCase
{
    /**
     * @dataProvider configTestData
     */
    public function testShouldDoAsExpected($config, $expected) {
        if( key_exists('composer_content', $config)) {
            $this->filesystem->put_contents($config['composer_path'], $config['composer_content']);
        }
        $this->launch_app("berlindb:initialize");
        self::assertSame($expected['composer_content'], $this->filesystem->get_contents($expected['composer_path']));
    }
}
