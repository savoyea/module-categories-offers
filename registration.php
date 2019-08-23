<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
use Magento\Framework\Component\ComponentRegistrar;

$registrar = new ComponentRegistrar();
if ($registrar->getPath(ComponentRegistrar::MODULE, 'Savoyea_Offers') === null) {
    ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Savoyea_Offers', __DIR__);
}
