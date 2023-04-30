<?php

namespace towo;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\player;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;

class Main extends PluginBase implements Listener {
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
	}
	public function onCommand(CommandSender $player, Command $cmd, $label, array $args):bool {
		switch ($cmd->getName ()) {
			case "투명화" :
				if (! isset ( $args [0] )) {
					$player->sendMessage ( "§f[ §a서버 §f] 투명화 명령어 도움말" );
					$player->sendMessage ( "§f[ §a서버 §f] /투명화 - 투명화 명령어를 확인합니다" );
					$player->sendMessage ( "§f[ §a서버 §f] /투명화 실행 - 투명화를 실행합니다" );
					$player->sendMessage ( "§f[ §a서버 §f] /투명화 해제 - 투명화를 해제합니다" );
					return true;
				}
				if ($args [0] == "실행" && $player->isOp()) {
					$player->sendMessage("§f[ §a서버 §f] 투명화가 실행되었습니다.");
					$player->addEffect (new EffectInstance(Effect::getEffect(14),999999,1));
					return true;
				}else if(!$player->isOp()){
					$player->sendMessage("§f[ §a서버 §f] 당신은 OP가 아닙니다.");
					return true;
				}
				if ($args [0] == "해제" && $player->isOp()) {
					$player->sendMessage("§f[ §a서버 §f] 투명화가 해제되었습니다.");
					$player->removeAllEffects ();
					return true;
				}else if(!$player->isOp()){
					$player->sendMessage("§f[ §a서버 §f] 당신은 OP가 아닙니다.");
					return true;
				}
			case "야간투시" :
				if (! isset ( $args [0] )) {
					$player->sendMessage ( "§f[ §a서버 §f] 야간투시 명령어 도움말" );
					$player->sendMessage ( "§f[ §a서버 §f] /야간투시 - 야간투시 명령어를 확인합니다" );
					$player->sendMessage ( "§f[ §a서버 §f] /야간투시 실행 - 야간투시를 실행합니다" );
					$player->sendMessage ( "§f[ §a서버 §f] /야간투시 해제 - 야간투시를 해제합니다" );
					return true;
				}
				if ($args [0] == "실행") {
					$player->sendMessage("§f[ §a서버 §f] 야간투시가 실행되었습니다.");
					$player->addEffect (new EffectInstance(Effect::getEffect(16),999999,1));
					return true;
				}
				if ($args [0] == "해제") {
					$player->sendMessage("§f[ §a서버 §f] 야간투시가 해제되었습니다.");
					$player->removeAllEffects ();
					return true;
				}
		  }
	}
}?>