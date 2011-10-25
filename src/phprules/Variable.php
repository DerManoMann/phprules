<?php
namespace phprules;

/**
 * A symbol that represents a value.
 *
 * @author Greg Swindle <greg@swindle.net>
 * @package phprules
 */
class Variable extends RuleElement {
    public $value;


    /**
     * Constructor initializes {@link $name}, and the {@link $value}.
     */
    public function __construct($name, $value) {
        parent::__construct( $name );
        $this->value = $value;
    }

    /**
     * Returns &quot;Variable.&quot;
     *
     * @return string
     */
    public function getType() {
        return "Variable";
    }

    /**
     * Get the truth value of this value.
     *
     * @return boolean The truth value.
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Set the truth value of this value.
     *
     * @param boolean value The truth value.
     */
    public function setValue($value) {
        $this->value = $value;
    }

    /**
     * Returns a human-readable statement and value.
     *
     * @return string
     */
    public function __toString() {
        return "[Variable name=" . $this->getName() . ", value=" . $this->value . "]";
    }

    /**
     * Determines whether another Variable's value is equal to its own value.
     *
     * @param Variable $variable
     * @return Proposition
     */
    public function equalTo(Variable $variable) {
        $statement = "( " . $this->getName() . " == " . $variable->getName() . " )";
        $truthValue = ($this->value == $variable->value);
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is <em>not</em> equal to its own value.
     *
     * @param Variable $variable
     * @return Proposition
     */
    public function notEqualTo(Variable $variable) {
        $statement = "( " . $this->getName() . " != " . $variable->getName() . " )";
        $truthValue = ($this->value != $variable->value);
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is less than to its own value.
     *
     * @param Variable $variable
     * @return Proposition
     */
    public function lessThan(Variable $variable) {
        $statement = "( " . $this->getName() . " < " . $variable->getName() . " )";
        $truthValue = ($this->value < $variable->value);
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is less than or equal to to its own value.
     *
     * @param Variable $variable
     * @return Proposition
     */
    public function lessThanOrEqualTo(Variable $variable) {
        $statement = "( " . $this->getName() . " <= " . $variable->getName() . " )";
        $truthValue = ($this->value <= $variable->value);
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is greater than to its own value.
     *
     * @param Variable $variable
     * @return Proposition
     */
    public function greaterThan(Variable $variable) {
        $statement = "( " . $this->getName() . " > " . $variable->getName() . " )";
        $truthValue = ($this->value > $variable->value);
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is greater than or equal to its own value.
     *
     * @param Variable $variable
     * @return Proposition
     */
    public function greaterThanOrEqualTo(Variable $variable) {
        $statement = "( " . $this->getName() . " >= " . $variable->getName() . " )";
        $truthValue = ($this->value >= $variable->value);
        return new Proposition($statement, $truthValue);
    }

}
