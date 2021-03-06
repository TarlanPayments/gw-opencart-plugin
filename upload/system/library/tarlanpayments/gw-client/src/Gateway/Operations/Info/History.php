<?php declare(strict_types = 1);

/*
 * This file is part of the tarlanpayments/gw-client package.
 *
 * (c) Tarlan Payments
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TarlanPayments\Gateway\Operations\Info;

use TarlanPayments\Gateway\DataSets\Info;
use TarlanPayments\Gateway\Interfaces\OperationInterface;
use TarlanPayments\Gateway\Operations\Operation;
use TarlanPayments\Gateway\Validator\Validator;

/**
 * Class History.
 *
 * This class describes dataset to perform HISTORY request.
 * Refer to official documentation for more information about HISTORY request.
 */
class History extends Operation implements OperationInterface
{
    /**
     * {@inheritdoc}
     */
    protected $method = 'POST';

    /**
     * {@inheritdoc}
     */
    protected $path = '/history';

    /**
     * @var Info
     */
    private $info;

    /**
     * History constructor.
     *
     * @param Validator $validator
     * @param Info      $info
     */
    public function __construct(Validator $validator, Info $info)
    {
        $this->validator = $validator;
        $this->info = $info;

        $this->dataSets = [$this->info];
    }

    /**
     * @return Info
     */
    public function info()
    {
        return $this->info;
    }
}
