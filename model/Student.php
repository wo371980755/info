<?php
class Student extends Person {
	public $score;
	function __construct() {
		echo "constructed executed...<br/>";
	}
	function __destruct() {
		echo "destruct executed...<br/>";
	}
	public function getScore() {
		return $this->score;
	}
	public function setScore($score) {
		$this->score = $score;
	}
}