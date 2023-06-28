<?php // framework/Routing/RouterInterface.php
namespace Ikoncoders\Framework\Routing;

use Ikoncoders\Framework\Http\Request;

interface RouterInterface
{
    public function dispatch(Request $request);
}