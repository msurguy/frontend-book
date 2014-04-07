DB::table('cities')
->where('name','like','%'.$query.'%')
->orderBy('name','asc')
->take(10)
->get();