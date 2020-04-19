<?php
// source: Z:\Programovani\Projekty\NETTEprg\app\Presenters/templates/Komponenty/success.latte

use Latte\Runtime as LR;

class Template14cc72bf9b extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['key'])) trigger_error('Variable $key overwritten in foreach on line 7');
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 7, 3');
		if (isset($this->params['keys'])) trigger_error('Variable $keys overwritten in foreach on line 3');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<?php
		$iterations = 0;
		foreach ($params as $keys => $item) {
			if (is_array($item)) {
?>


<?php
				$iterations = 0;
				foreach ($item as $key =>$item) {
					?>            <?php echo LR\Filters::escapeHtmlText($key) /* line 8 */ ?>=> <?php echo LR\Filters::escapeHtmlText($item) /* line 8 */ ?><br>
<?php
					$iterations++;
				}
			}
			else {
				?>        <?php echo LR\Filters::escapeHtmlText($keys) /* line 11 */ ?>=> <?php echo LR\Filters::escapeHtmlText($item) /* line 11 */ ?><br>

<?php
			}
			$iterations++;
		}
		
	}

}
