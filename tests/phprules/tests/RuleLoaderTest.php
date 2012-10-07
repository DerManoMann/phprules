<?php
namespace phprules\tests;

use phprules\Proposition;
use phprules\RuleLoader;
use phprules\source\FileSource;

class RuleLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->loader = new RuleLoader();
        $this->dataFolderPath = __DIR__.'/data';
    }

    public function testLoadRule()
    {
        $rule = $this->loader->loadRule(new FileSource($this->dataFolderPath.'/sfu/rule.txt'));

        $this->assertNotNull($rule);
        $this->assertNotNull($rule->getElements());
        $this->assertEquals(9, count($rule->getElements()));
    }

    public function testLoadRuleContext()
    {
        $ruleContext = $this->loader->loadRuleContext(new FileSource($this->dataFolderPath.'/sfu/context-true.txt'));

        $this->assertNotNull($ruleContext);
        $this->assertNotNull($ruleContext->elements);
        $this->assertEquals(5, count($ruleContext->elements));
    }

    /**
     * Evaluate a test rule.
     *
     * @param string name The rule directory name.
     */
    protected function evaluateRule($name)
    {
        $rule = $this->loader->loadRule(new FileSource($this->dataFolderPath.'/'.$name.'/rule.txt'));
        $ruleContext = $this->loader->loadRuleContext(new FileSource($this->dataFolderPath.'/'.$name.'/context-true.txt'));

        $p = $rule->evaluate($ruleContext);
        $this->assertNotNull($p);
        $this->assertTrue($p instanceof Proposition);
        $this->assertNotNull($p->getName());
        $this->assertTrue($p->value);

        $ruleContext = $this->loader->loadRuleContext(new FileSource($this->dataFolderPath.'/'.$name.'/context-false.txt'));

        $p = $rule->evaluate($ruleContext);
        $this->assertNotNull($p);
        $this->assertTrue($p instanceof Proposition);
        $this->assertNotNull($p->getName());
        $this->assertFalse($p->value);
    }

    public function testEvaluateSfu()
    {
        $this->evaluateRule('sfu');
    }

    public function testEvaluateSfuSimplified()
    {
        $this->evaluateRule('sfu-simplified');
    }

    public function testNested()
    {
        $this->evaluateRule('nested');
    }

    public function testSimplified()
    {
        $this->evaluateRule('simplified');
    }

}
