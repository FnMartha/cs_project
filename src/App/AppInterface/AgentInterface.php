<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:36 PM
 */

namespace App\AppInterface;


use App\Models\Agent;

/**
 * Interface AgentInterface
 * @package App\AppInterface
 */
interface AgentInterface extends BaseInterface
{
    /**
     * @param Agent $agent
     * @return array|bool
     */
    public function create(Agent $agent);

    /**
     * @param Agent $agent
     * @param $id
     * @return array|bool
     */
    public function update(Agent $agent, $id);

}