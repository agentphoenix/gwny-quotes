<?php namespace Quote\Data\Presenters;

use Laracasts\Presenter\Presenter;

class SurveyPresenter extends Presenter {

	public function commentGolf()
	{
		return $this->formatComments($this->entity->golf_comments);
	}

	public function commentHotel()
	{
		return $this->formatComments($this->entity->hotel_comments);
	}

	public function commentPackage()
	{
		return $this->formatComments($this->entity->overall_comments);
	}

	public function ratingHotel()
	{
		return $this->entity->hotel_rating;
	}

	public function ratingPackage()
	{
		return $this->entity->overall_rating;
	}

	public function recommend()
	{
		if ((bool) $this->entity->recommend)
			return 'Yes';

		return 'No';
	}

	public function useComments()
	{
		if ((bool) $this->entity->use_comments)
			return 'Yes';

		return 'No';
	}

	protected function formatComments($comment)
	{
		if ((bool) $this->entity->use_comments)
			return "<h4 class='list-group-item-heading'>{$comment}</h4>";

		return "<h4 class='list-group-item-heading text-danger'>{$comment}</h4>";
	}

}
