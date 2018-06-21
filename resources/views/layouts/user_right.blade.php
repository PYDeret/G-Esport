<div class="col-md-3">
    <div class="side-block">
        <h4 class="block-title">À propos de moi</h4>
        <div class="block-content">
            {{ Auth::user()->about }}
        </div>
    </div>

    <?php if(!empty($leagueData) && $leagueData != ""): ?>
    <div class="side-block">
        <h4 class="block-title">League of Legends</h4>
        <div class="block-content pt-5">
            
            <table style="padding:10px;text-align:center;">

                

                    <?php foreach($leagueData->matches as $oneGame): ?>
                    <?php //die(print_r($oneGame));?>

                                <tr style="margin-top:10px;padding:10px;background-color:<?php if($oneGame->data->win != false): echo '#DEEEFD'; else: echo '#eed8d8'; endif;?>"> 
                                    <td>
                                        <div style="width:50%;display:inline-block">
                                            <img src="<?= $oneGame->image; ?>" style="width:50px; height:50px;"/>
                                        </div>
                                        <div style="width:50%;display:inline-block">
                                            <?php if($oneGame->lane == "NONE"): ?>
                                                <?php $oneGame->lane = "JUNGLE"; ?>
                                            <?php endif; ?>
                                            <?= $oneGame->lane; ?>
                                            <br />
                                            <?= $oneGame->data->kills." / ".$oneGame->data->deaths." / ".$oneGame->data->assists; ?>
                                            <br />
                                        </div>
                                        <?php //echo date('d/m/Y H:i:s', substr($oneGame->timestamp, 0, -3)); ?>
                                        <div style="padding:10px">
                                            <img src="<?= $oneGame->data->spellOne ?>" />
                                            <img src="<?= $oneGame->data->spellTwo ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr style="padding:10px;margin-top:10px;padding:10px;background-color:<?php if($oneGame->data->win != false): echo '#DEEEFD'; else: echo '#eed8d8'; endif;?>">
                                    <td>
                                        <img src="<?= $oneGame->data->item0 ?>" style="width:40px;height:40px"/>
                                        <img src="<?= $oneGame->data->item1 ?>" style="width:40px;height:40px"/>
                                        <img src="<?= $oneGame->data->item2 ?>" style="width:40px;height:40px"/>
                                    </td>
                                </tr>
                                <tr style="padding:10px;margin-top:10px;padding:10px;background-color:<?php if($oneGame->data->win != false): echo '#DEEEFD'; else: echo '#eed8d8'; endif;?>">
                                    <td>
                                        <img src="<?= $oneGame->data->item3 ?>" style="width:40px;height:40px"/>
                                        <img src="<?= $oneGame->data->item4 ?>" style="width:40px;height:40px"/>
                                        <img src="<?= $oneGame->data->item5 ?>" style="width:40px;height:40px"/>
                                    </td>
                                </tr>

                    <?php endforeach; ?>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>