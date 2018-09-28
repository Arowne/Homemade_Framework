<?php
class TemplateEngine
{
  public function run($path)
  {

    $content = file_get_contents($path);
    $content = preg_replace('/{{(.*)}}/', '<?= htmlentities($1);?>', $content);
    $content = preg_replace('/{%(.*)%}/', '<?php htmlentities($1);?>', $content);
    $content = preg_replace('/@if\((.*)\)/', '<?php if($1):?>', $content);
    $content = preg_replace('/@elseif\((.*)\)/', '<?php elseif($1):?>', $content);
    $content = preg_replace('/@else/', '<?php else:?>', $content);
    $content = preg_replace('/@endif/', '<?php endif;?>', $content);
    $content = preg_replace('/@foreach\((.*)\)/', '<?php foreach($1):?>', $content);
    $content = preg_replace('/@endforeach/', '<?php endforeach;?>', $content);
    $content = preg_replace('/@isset\((.*)\)/', '<?php if(isset($1)):?>', $content);
    $content = preg_replace('/@endisset/', '<?php endif;?>', $content);
    $content = preg_replace('/@empty\((.*)\)/', '<?php if(empty($1)):?>', $content);
    $content = preg_replace('/@endempty/', '<?php endif;?>', $content);

    return $content;

  }
}
