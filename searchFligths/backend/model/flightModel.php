class FlightInfo extends AppModel
{
    public $id;
    public $origin;
    public $destination;
    public $departure_time;
    public $airline_name;
    public $price;
    public $class;
    public $round_trip;
    public $adult_seats;
    public $child_seats;

    public function __construct()
    {
        $this->table = 'flight_info';
    }

    public function getFlights($origin, $destination, $departure_date, $return_date, $adult_seats, $child_seats, $class, $round_trip)
    {
        $query = $this->find('all')
            ->where([
                'origin' => $origin,
                'destination' => $destination,
                'departure_time >= ' => $departure_date,
                'departure_time <= ' => $return_date,
                'adult_seats >= ' => $adult_seats,
                'child_seats >= ' => $child_seats,
                'class' => $class,
            ]);

        if ($round_trip) {
            $query->where('departure_time <= ' . $return_date);
        }

        return $query->all();
    }
}
