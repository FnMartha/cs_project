<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 9/14/17
 * Time: 3:36 PM
 */

namespace App\AppInterface;


use App\Models\Agent;

interface AgentInterface extends BaseInterface
{
    public function create(Agent $agent);
    public function update(Agent $agent, $id);

}