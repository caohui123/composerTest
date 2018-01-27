<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 15:58
 */
require_once __DIR__.'/../bootsrap.php';

print_r(gettext ("Welcome to My PHP Application"));exit;
use Symfony\Component\Workflow\DefinitionBuilder;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\Workflow;
use Symfony\Component\Workflow\MarkingStore\SingleStateMarkingStore;

$builder = new DefinitionBuilder();
$builder->addPlaces(['draft', 'review', 'rejected', 'published']);

// Transitions are defined with a unique name, an origin place and a destination place
// 过渡是用一个唯一名称、一个原始位置、一个目标位置来定义的
$builder->addTransition(new Transition('to_review', 'draft', 'review'));
$builder->addTransition(new Transition('publish', 'review', 'published'));
$builder->addTransition(new Transition('reject', 'review', 'rejected'));

$definition = $builder->build();

$marking = new SingleStateMarkingStore();
$workflow = new Workflow($definition, $marking);
$subject = new \stdClass();
$subject->marking = 'review';

$falg = $workflow->can($subject,'reject');
if($falg){
    $workflow->apply($subject, 'reject');
}
$falg = $workflow->can($subject,'reject');
echo $subject->marking;exit;
print_r($falg);exit;
