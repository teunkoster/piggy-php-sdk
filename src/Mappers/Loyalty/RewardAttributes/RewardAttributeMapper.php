<?php

namespace Piggy\Api\Mappers\Loyalty\RewardAttributes;

use Piggy\Api\Models\Loyalty\RewardAttributes\RewardAttribute;
use stdClass;


class RewardAttributeMapper
{
    /**
     * @param stdClass $rewardAttribute
     * @return RewardAttribute
     */
    public function map(stdClass $rewardAttribute): RewardAttribute
    {
        $isSoftReadOnly = property_exists($rewardAttribute, 'is_soft_read_only') && $rewardAttribute->is_soft_read_only;
        $isHardReadOnly = property_exists($rewardAttribute, 'is_hard_read_only') && $rewardAttribute->is_hard_read_only;
        $isPiggyDefined = property_exists($rewardAttribute, 'is_piggy_defined') && $rewardAttribute->is_piggy_defined;

        $options = null;
        if (property_exists($rewardAttribute, 'options') && $rewardAttribute->options != null) {

            foreach ($rewardAttribute->options as $item) {
                $options[] = get_object_vars($item);
            }
        }

        return new RewardAttribute(
            $rewardAttribute->name,
            $rewardAttribute->label,
            $rewardAttribute->data_type,
            $rewardAttribute->field_type ?? null,
            $rewardAttribute->description ?? null,
            $isSoftReadOnly,
            $isHardReadOnly,
            $isPiggyDefined,
            $options,
            $rewardAttribute->placeholder ?? null
        );
    }
}