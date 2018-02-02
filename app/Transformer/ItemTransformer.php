<?php namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class ItemTransformer extends TransformerAbstract {

    public function transform($item) {
        return [
            'item_id' => $item->id,
            'item_title' => $item->title,
            'item_description' => $item->description,
            'user_id' => $item->user->id,
            'user_name' => $item->user->name,
        ];
    }
}
