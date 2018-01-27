<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 14:41
 */

require_once __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('hello', new Route('/hello/{name}', array(
        '_controller' => function (Request $request) {
            return new Response(
                sprintf("Hello %s", $request->get('name'))
            );
        })
));

$request = Request::createFromGlobals();

$matcher = new UrlMatcher($routes, new RequestContext());
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use Symfony\Component\HttpKernel\Event\KernelEvent;

class TestListener implements EventSubscriberInterface
{

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getResponse();
        //print_r($request);exit;
        echo 'onKernelRequest';
    }
    public function onKernelFinishRequest(FinishRequestEvent $event)
    { $request = $event->getRequest();
        echo 'onKernelFinishRequest';
    }

    public static function getSubscribedEvents()
    {
        return array(
            \Symfony\Component\HttpKernel\KernelEvents::REQUEST => array(array('onKernelRequest', 32)),
            \Symfony\Component\HttpKernel\KernelEvents::FINISH_REQUEST
            => array(array('onKernelFinishRequest', 0)),
        );
    }
}
//$request = new Request();
// for example, possibly set its _controller manually
// 作为示例，可以手动设置其_controller属性
//$request->attributes->set('_controller', '...');


$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new RouterListener($matcher, new RequestStack()));
$dispatcher->addSubscriber(new TestListener());

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$kernel = new HttpKernel($dispatcher, $controllerResolver, new RequestStack(), $argumentResolver);

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);




exit;



