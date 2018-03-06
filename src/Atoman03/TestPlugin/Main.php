<?php

namespace Atoman03\TestPlugin;

use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\Player;
use pocketmine\Server;


class Main extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(" Test has been enabled");   
    }
    
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if(!($sender instanceof Player)){
            $sender->sendMessage(" Only player can run this command");
        }elseif($sender instanceof Player){
            if(($command->getName()) == "test"){
                if(!(isset($args[0]))){
                    if($sender->hasPermission("tt")){
                        $sender->sendMessage(c::RED."Usage:".c::RESET.c::GRAY." [heal:feed]");
                    }
                }elseif(!($sender->hasPermission("tt"))){
                    $sender->sendMessage(c::DARK_BLUE."[TestPlugin]".c::RESET." Invalid perms");
                }
                if($args[0] == "heal"){
                    if($sender->hasPermission("tt.heal")){
                        $sender->sendMessage(c::DARK_BLUE."[TestPlugin]".c::RESET." You have been healed");
                        $sender->setHealth(20.0);
                    }elseif(!($sender->hasPermission("tt.heal"))){
                        $sender->sendMessage(c::DARK_BLUE."[TestPlugin]".c::RESET." Invalid perms");
                    }
                }
                if($args[0] == "feed"){
                    if($sender->hasPermission("tt.feed")){
                        $sender->sendMessage(c::DARK_BLUE."[TestPlugin]".c::RESET." You have been fed");
                        $sender->setFood("20.0");
                    }elseif(!($sender->hasPermission("tt.feed"))){
                        $sender->sendMessage(c::DARK_BLUE."[TestPlugin]".c::RESET." Invalid perms");
                    }
                }
            }
        }
        return true;
    }
    
    public function onDisable(){
        $this->getLogger()->warning(" Test has been disabled");
    }
    
}