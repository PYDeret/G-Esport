<div class="col-md-3">
    <div class="side-block">
    <h4 class="block-title">À propos de moi</h4>
    <div class="block-content">
        {{ Auth::user()->about }}
    </div>
    </div>
    <div class="side-block">
    <h4 class="block-title">League of Legends</h4>
    <div class="block-content pt-5">
        
        <table style="padding:10px;text-align:center;">

          <?php foreach($leagueData->matches as $oneGame): ?>
          <?php //die(print_r($oneGame));?>
            <tr style="margin-top:10px;padding:10px;border-bottom: 1px solid;background-color:<?php if($oneGame->data->win != false): echo '#DEEEFD'; else: echo '#eed8d8'; endif;?>">
                <td style="width:33%">
                    <img src="<?= $oneGame->image; ?>" style="width:50px; height:50px;"/>
                </td>
                <td style="width:33%">
                    <?php if($oneGame->lane == "NONE"): ?>
                        <?php $oneGame->lane = "JUNGLE"; ?>
                    <?php endif; ?>
                    <?= $oneGame->lane; ?>
                    <br />
                    <?= $oneGame->data->kills." / ".$oneGame->data->deaths." / ".$oneGame->data->assists; ?>
                    <br />
                    <?php //echo date('d/m/Y H:i:s', substr($oneGame->timestamp, 0, -3)); ?>
                    <div style="padding:10px">
                        <img src="<?= $oneGame->data->spellOne ?>" />
                        <img src="<?= $oneGame->data->spellTwo ?>" />
                    </div>
                </td>
                <td style="width:33%">
                    <div>
                      <div style="padding:10px">
                        <img src="<?= $oneGame->data->item0 ?>" />
                        <img src="<?= $oneGame->data->item1 ?>" />
                        <img src="<?= $oneGame->data->item2 ?>" />
                      </div>
                      <div style="padding:10px">
                        <img src="<?= $oneGame->data->item3 ?>" />
                        <img src="<?= $oneGame->data->item4 ?>" />
                        <img src="<?= $oneGame->data->item5 ?>" />
                      </div>
                    </div>
                </td>
            </tr>
          <?php endforeach; ?>

          </table>
    </div>
    </div>
</div>