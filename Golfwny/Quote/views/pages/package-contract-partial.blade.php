<h2>Contract</h2>

<p>Dear {{ $quote->present()->firstName }},</p>

<p>Thank you for booking your golf package with Golf WNY. Below, you will find all the information about your golf package as well as the Package Contract outlining the details. Please note the cancellation fees and the time frames to be monitored. After careful review, please initial and electronically accept the contract at the bottom of this page.</p>

<p>Payments are as follows:</p>

<ul>
	@if ($quote->present()->daysToPackage() <= 30)
		<li>Because your package will occur within 30 days of today, the entire package cost of <strong>{{ $quote->present()->price }}</strong> is due immediately.</li>
	@else
		<li>A <strong>{{ $quote->present()->deposit }}</strong> deposit is due {{ $quote->present()->depositDue }}.</li>
		<li>The remaining <strong>{{ $quote->present()->remaining }}</strong> is due {{ $quote->present()->remainingDue }}.</li>
	@endif
</ul>

<p>Should you have any questions or concerns regarding the details of your contract, do not hesitate to call directly at 585-281-8942.</p>

<p>You will be able to review this contract at any time by checking on the status of your package from this page.</p>

<p>The Golf WNY staff is looking forward to working with you and making your experience in {{ $quote->present()->region }} an enjoyable success.</p>

<p>Thank you again for choosing us for your Stay-n-Play Golf Package.</p>

<h3>Golf WNY Stay-n-Play Golf Package Contract</h3>

<p>The following package is for {{ $quote->present()->arrival }} - {{ $quote->present()->departure }} for {{ $quote->present()->people }}. All players will be lodging ({{ $quote->present()->numberOfNights }}) nights at the {{ $quote->present()->hotel }}. Pricing is based on double occupancy.</p>

<p>Hotel accommodations include ({{ $quote->present()->numberOfRooms }}) rooms with the following amenities:</p>

{{ $quote->present()->hotelAmenities }}

<p>This package will also include ({{ $quote->present()->daysOfGolf }}) days of golf at {{ $quote->present()->region }}'s finest golf courses. These courses include {{ $quote->present()->golfCoursesNice }}. Included will be golf with cart at the course(s). The total cost of the package is <strong>{{ $quote->present()->price }}</strong> (excludes any gratuities). Tee times and dates are as follows:</p>

<ul>
	@foreach ($quote->getCourses() as $item)
		@if ($item->holes == 18)
			<li>{{ $item->present()->holes }} for {{ $item->present()->people }} at {{ $item->present()->course }} on {{ $item->present()->arrival }} at {{ $item->present()->time }}</li>
		@else
			<li>{{ $item->present()->holes }} for {{ $item->present()->people }} at {{ $item->present()->course }} on {{ $item->present()->arrival }} at {{ $item->present()->time }} and {{ $item->present()->time2 }}</li>
		@endif
	@endforeach
</ul>

<h4>BOOKED ROOMS</h4>

<p>Upon acceptance of this contract, Golf WNY is holding {{ $quote->present()->numberOfRooms }} rooms for {{ $quote->present()->numberOfNights }} nights for your use over the contracted dates.</p>

<h4>CANCELLATION</h4>

<p>In the event of cancellation by {{ $quote->present()->name }}, Golf WNY is entitled to liquidated damages as follows:</p>

@if ($quote->present()->daysToPackage <= 30)
	<p>This Stay-N-Play Package is non-refundable. Golf WNY is not responsible for inclement weather.</p>
@else
	<p>This Stay-N-Play Package is refundable up to 30 days of arrival with all funds being returned. Any package cancelled inside of 30 days of arrival is non-refundable. Golf WNY is not responsible for inclement weather.</p>
@endif

<p>Please follow the email link sent to make payment via credit card.</p>

<h3>Agreement</h3>

<p>This agreement shall be effective between the {{ $quote->present()->name }} and Golf WNY.

@if ($quote->present()->daysToPackage <= 30)
	Acceptance is due immediately,
@else
	Acceptance is due no later than {{ $quote->present()->depositDue }},
@endif

otherwise space will no longer be held and the terms of this agreement may be voided or renegotiated. No other person has the authority, expressed or implied, to accept such agreement or modification on behalf of Golf WNY.</p>

<h4>ADDITIONAL TERMS AND CONDITIONS</h4>

<h4>INCIDENTALS</h4>

<p>At check-in of the {{ $quote->present()->hotel }} you will be required to provide a credit card to cover any incidentals. Golf WNY is not responsible and will not be liable to pay for any incidentals occurred during your stay.</p>

<h4>CHECK-IN &amp; CHECK-OUT</h4>

<p>Guest accommodations will be available at 3:00 pm on arrival day and reserved until 11:00 am on departure day. Any attendee wishing special consideration for late checkout should inquire at the front desk on the day of departure.</p>

<p>The {{ $quote->present()->hotel }} is a 100% non-smoking hotel. If there is evidence of smoking in the overnight rooms, there will be a charge of $150 applied to the credit card on file per room.</p>

<h4>PARKING</h4>

<p>Complimentary</p>

<h4>Americans with Disabilities Act</h4>

<p>The {{ $quote->present()->hotel }} continually makes a good faith effort to ensure that it is compliant with applicable provisions of Title III of the Americans with Disabilities Act.</p>

<h4>Security</h4>

<p>The {{ $quote->present()->hotel }} does not have security on site but can rent security officers if needed at a cost to the client. The {{ $quote->present()->hotel }} and Golf WNY does not assume responsibility for the damages or loss of any merchandise or articles brought to the hotel.</p>

<h4>MISCELLANEOUS PROVISIONS</h4>

<p>This contract is made and to be performed in {{ $quote->present()->region }}, New York, and shall be governed by and construed in accordance with New York law. By executing this agreement, {{ $quote->present()->name }} consents to the exercise of personal jurisdiction over it by the courts of the State of New York. Golf WNY is not responsible for any loss or damage, no matter how caused, to any samples, displays, properties, or personal effects. This contract is the entire agreement between the parties, superseding all prior proposals both oral and written, negotiations, representations, commitments and other communications between the parties, and may only be supplemented or changed in writing, signed by a representative of the group and the Golf WNY. No representative of the Golf WNY has been or is authorized to make any representation which varies from the express terms of this contract, though this contract may be supplemented or amended in writing. In the event of litigation arising from or associated with this contract, the parties agree that the prevailing party therein shall recover its attorneys' fees and costs incurred therein. Any legal action in connection with this agreement shall be brought or maintained only in the courts of the State of New York, and only in the respective county of the establishment. No food and/or beverage of any kind will be permitted to be brought into the public areas of the {{ $quote->present()->hotel }} by the group or any of the group's guests.</p>

<h4>AUTHORITY</h4>

<p>The persons signing the agreement on behalf of Golf WNY and {{ $quote->present()->name }} each warrant that they are authorized to make agreements and to bind their principals to this agreement.</p>

<p>This contract shall be deemed accepted only after it has been initialed and electronically accepted by {{ $quote->present()->name }}.</p>

<p>We look forward to working with you.</p>

<p><strong>I have read these terms and conditions and agree that they are included as a part of the contract.</strong></p>

<!--<p><u>By {{ $quote->present()->name }} authorized representative:</u></p>

<p><u>____________________________________ Date:_________</u></p>

<p><u>{{ $quote->present()->name }}</u></p>

<p><u>By the Golf WNY authorized representative:</u></p>

<p><u>____________________________________ Date:_________</u></p>

<p><u>Eric LaBarr<br>
Golf WNY Founder</u></p>-->