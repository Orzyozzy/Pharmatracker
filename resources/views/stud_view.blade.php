<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
      <table border = 1>
         <tr>
            <th>Leave Type</th>
            <th>Time</th>
            <th>From</th>
            <th>To</th>
            <th>No of Days</th>
            <th>Reason</th>
         </tr>
         @foreach ($users as $items)
         <tr>
            <td hidden class="id">{{ $items->id }}</td>
            <td class="leave_type">{{$items->leave_type}}</td>
            <td class="time">{{$items->time}}</td>
            <td hidden class="from_date">{{ $items->from_date }}</td>
            <td>{{date('d F, Y',strtotime($items->from_date)) }}</td>
            <td hidden class="to_date">{{$items->to_date}}</td>
            <td>{{date('d F, Y',strtotime($items->to_date)) }}</td>
            <td class="day">{{$items->day}} Day</td>
            <td class="leave_reason">{{$items->leave_reason}}</td>
         </tr>
         @endforeach
      </table>
   </body>
</html>