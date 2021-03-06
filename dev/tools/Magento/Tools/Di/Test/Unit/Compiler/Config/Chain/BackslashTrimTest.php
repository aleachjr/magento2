<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Tools\Di\Test\Unit\Compiler\Config\Chain;

use \Magento\Tools\Di\Compiler\Config\Chain\BackslashTrim;

class BackslashTrimTest extends \PHPUnit_Framework_TestCase
{
    public function testModifyArgumentsDoNotExist()
    {
        $inputConfig = [
            'data' => []
        ];
        $modifier = new BackslashTrim();
        $this->assertSame($inputConfig, $modifier->modify($inputConfig));
    }

    public function testModifyArguments()
    {
        $modifier = new BackslashTrim();
        $this->assertEquals($this->getOutputConfig(), $modifier->modify($this->getInputConfig()));
    }

    /**
     * Input config
     *
     * @return array
     */
    private function getInputConfig()
    {
        return [
            'arguments' => [
                '\\Class' => [
                    'argument_type' => ['_i_' => '\\Class\\Dependency'],
                    'argument_not_shared' => ['_ins_' => '\\Class\\Dependency'],
                    'array' => [
                        'argument_type' => ['_i_' => '\\Class\\Dependency'],
                        'argument_not_shared' => ['_ins_' => '\\Class\\Dependency'],
                        'array' => [
                            'argument_type' => ['_i_' => '\\Class\\Dependency'],
                            'argument_not_shared' => ['_ins_' => '\\Class\\Dependency'],
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * Output config
     *
     * @return array
     */
    private function getOutputConfig()
    {
        return [
            'arguments' => [
                'Class' => [
                    'argument_type' => ['_i_' => 'Class\\Dependency'],
                    'argument_not_shared' => ['_ins_' => 'Class\\Dependency'],
                    'array' => [
                        'argument_type' => ['_i_' => 'Class\\Dependency'],
                        'argument_not_shared' => ['_ins_' => 'Class\\Dependency'],
                        'array' => [
                            'argument_type' => ['_i_' => 'Class\\Dependency'],
                            'argument_not_shared' => ['_ins_' => 'Class\\Dependency'],
                        ]
                    ]
                ]
            ]
        ];
    }
}
