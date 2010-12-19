<?php 

function isLiveUser() {

    $ci = get_instance();
    $nickname = $ci->session->userdata('user');
    $query = $ci->db->get_where('user', ['nickname' => $nickname]);

    if ($query->num_rows() < 1) {
        redirect('oauth/logout');
    }

}

function status($id) {
    switch ($id) {
        case '1':
            return "success";
            break;
        case '2':
            return "danger";
            break;
        case '3':
            return "warning";
            break;
        
        default:
            return "info";
            break;
    }
}

function access($id) {

    switch ($id) {
        case '1':
            return 'danger';
            break;
        
        default:
            return 'primary';
            break;
    }
}

function getHumanDate($time) {

    $date = unix_to_human($time);
    $unix = human_to_unix($date);
    return date('d F Y', $unix);

}

function getHumanTime($time) {

    $date = explode(' ', unix_to_human($time));
    return "$date[1] $date[2]";

}

function sayGreetings() {

    $now = now('Asia/Jakarta');
    $unixtohuman = unix_to_human($now);

    $time = explode(' ', $unixtohuman);
    $hour = explode(':', $time[1]);
    
    switch ($hour[0]) {
        case '01':
            # code...
            return ($time[2] == 'AM') ? 'Good Night' : 'Good Afternoon';
            break;
        case '02':
            # code...
            return ($time[2] == 'AM') ? 'Good Night' : 'Good Afternoon';
            break;
        case '03':
            # code...
            return ($time[2] == 'AM') ? 'Good Night' : 'Good Afternoon';
            break;
        case '04':
            # code...
            return ($time[2] == 'AM') ? 'Good Morning' : 'Good Afternoon';
            break;
        case '05':
            # code...
            return ($time[2] == 'AM') ? 'Good Morning' : 'Good Afternoon';
            break;
        case '06':
            # code...
            return ($time[2] == 'AM') ? 'Good Morning' : 'Good Afternoon';
            break;
        case '07':
            # code...
            return ($time[2] == 'AM') ? 'Good Morning' : 'Good Night';
            break;
        case '08':
            # code...
            return ($time[2] == 'AM') ? 'Good Morning' : 'Good Night';
            break;
        case '09':
            # code...
            return ($time[2] == 'AM') ? 'Good Morning' : 'Good Night';
            break;
        case '10':
            # code...
            return ($time[2] == 'AM') ? 'Good Morning' : 'Good Night';
            break;
        case '11':
            # code...
            return ($time[2] == 'AM') ? 'Good Night' : 'Good Afternoon';
            break;
        case '12':
            # code...
            return ($time[2] == 'AM') ? 'Good Night' : 'Good Afternoon';
            break;
        
    }

}

function is_weekend($day) {

    switch ($day) {
        case 'Saturday':
            return 'Happy Weekend';
            break;

        case 'Sunday':
            return 'Happy Weekend';
            break;
            
        default:
            return "Happy $day";
            break;
    }
}

function isEmptyTodoo($data, $pesan) {
    if (empty($data)) {
        return '<li class="list-group mb-2">
            <div class="alert alert-info" role="alert">
                <p class="mb-2 lead">'. $pesan .'</p>
                <a href="'.base_url("newtodo").'" class="btn btn-primary btn-sm">
                    Create Another Todoo
                </a>
            </div>
        </li>';
    }

}

function showCountingBadge($count) {
    if ($count > 0) return '<span class="badge badge-danger">'.$count.'</span>'; 

}