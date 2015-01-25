<?php namespace Quote\Data\Repositories;

use Date,
	QuoteItem,
	QuoteItemRepositoryInterface;

class QuoteItemRepository extends BaseRepository implements QuoteItemRepositoryInterface {

	protected $model;

	public function __construct(QuoteItem $model)
	{
		$this->model = $model;
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update($id, array $data)
	{
		// Get the item
		$item = $this->getById($id);

		if ($item)
		{
			$updatedItem = $item->fill($data);

			$updatedItem->save();

			return $updatedItem;
		}

		return false;
	}
	
}