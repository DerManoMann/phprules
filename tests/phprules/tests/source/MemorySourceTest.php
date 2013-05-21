<?php
namespace phprules\tests\source;

use phprules\RuleContext;
use phprules\RuleLoader;
use phprules\source\MemorySource;

class MemorySourceTest extends \PHPUnit_Framework_TestCase
{

    public function testWithRuleContext()
    {
        $inlineRuleContext = new RuleContext();
        $inlineRuleContext->addElement('var1', 'foo');

        $ruleLoader = new RuleLoader();
        $memoryRuleContext = $ruleLoader->loadRuleContext(new MemorySource(
            array(
                'var1 EQUALS foo',
            )
        ));

        $this->assertEquals($inlineRuleContext, $memoryRuleContext);
    }

}
