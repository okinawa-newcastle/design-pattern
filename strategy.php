<?php

//
// https://liginc.co.jp/web/programming/php/136131

// 飛行のインターフェイス
interface FlyBehavior {
	public function fly();
}

interface RunBehavior {
	public function run();
}

// 具体的なクラス
class FlyHigh implements FlyBehavior {
	public function fly() {
		echo "高く飛んでいる";
	}
}

// 具体的なクラス
class FlyLow implements FlyBehavior {
	public function fly() {
		echo "低く飛んでいる";
	}
}

// 具体的なクラス
class RunFast implements RunBehavior {
	public function run() {
		echo "飛べないよ";
	}
}

// 鳥類の「ベースクラス」
abstract class Birds {
	abstract function __construct();

	abstract function display();

	public function sleep() {
		echo "寝ている";
	}

	public function eat() {
		echo "餌を食べている";
	}
}

// 飛ぶタイプの鳥類
abstract class FlyableBirds extends Birds implements FlyBehavior {
	/** @type  FlyBehavior */
	protected $flyBehavior;

	public function fly() {
		$this->flyBehavior->fly();
	}
}

// 走るタイプの鳥類
abstract class RunableBirds extends Birds implements RunBehavior {
	/** @type  RunBehavior */
	protected $runBehavior;

	public function run() {
		$this->runBehavior->run();
	}
}

// 具体的な鳥のクラス（フクロウ）
class Owl extends FlyableBirds {
	function __construct() {
		$this->flyBehavior = new FlyLow();
	}

	function display() {
		echo 'フクロウです';
	}
}

// 具体的な鳥のクラス（カラス）
class Raven extends FlyableBirds {
	function __construct() {
		$this->flyBehavior = new FlyHigh();
	}

	function display() {
		echo 'カラスです';
	}
}

// 具体的な鳥のクラス（駝鳥）
class Ostrich extends RunableBirds {
	function __construct() {
		$this->runBehavior = new RunFast();
	}

	function display() {
		echo '駝鳥です';
	}
}

$ostrich = new Ostrich();
$raven   = new Raven();
$owl     = new Owl();

?>

<h1>駝鳥</h1>

<p>
	<?php $ostrich->run(); ?>
</p>
<p>
	<?php $ostrich->eat(); ?>
</p>
<p>
	<?php $ostrich->sleep(); ?>
</p>
<p>
	<?php $ostrich->display(); ?>
</p>

<h2>カラス</h2>
<p>
	<?php $raven->fly(); ?>
</p>
<p>
	<?php $raven->eat(); ?>
</p>
<p>
	<?php $raven->sleep(); ?>
</p>
<p>
	<?php $raven->display(); ?>
</p>

<h2>フクロウ</h2>
<p>
	<?php $owl->fly(); ?>
</p>
<p>
	<?php $owl->eat(); ?>
</p>
<p>
	<?php $owl->sleep(); ?>
</p>
<p>
	<?php $owl->display(); ?>
</p>