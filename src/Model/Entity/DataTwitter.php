<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DataTwitter Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $kind_id
 * @property int $at_classification_id
 * @property int $denomination_id
 * @property int $mt_classification_id
 * @property int $classification_id
 * @property string $classification_name
 * @property int $respondent_id
 * @property string $respondent_name
 * @proerty boolean $classifying
 * @property boolean $tagging
 * @property boolean $chunking
 * @property boolean $locating
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Kind $kind
 * @property \App\Model\Entity\Classification $classification
 * @property \App\Model\Entity\Respondent $respondent
 * @property \App\Model\Entity\DataChunk $datachunk
 * @property \App\Model\Entity\DataPiece $datapiece
 * @property \App\Model\Entity\DataKind $datakind
 * @property \App\Model\Entity\DataWord $dataword
 * @property \App\Model\Entity\DataSpot $dataspot
 * @property \App\Model\Entity\LabelKind $labelkind
 * @property \App\Model\Entity\LabelWord $labelword
 * @property \App\Model\Entity\LabelChunk $labelchunk
 * @property \App\Model\Entity\LabelSpot $labelspot
 * @property \App\Model\Entity\TrainKind $trainkind
 * @proerty \App\Model\Entity\TrainWord $trainword
 */
class DataTwitter extends Entity
{

}
