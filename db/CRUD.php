<?php
// require "../../db/connection.php";
class CRUD
{

    function __construct()
    {
        require "db_podcast.php";
        $this->dbcon = $con;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }
    public function create_podcast($podcast_name, $category, $podcast_description, $user, $imgContent, $id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO podcast_manager(podcast_name, category, podcast_description, user,images,status,user_id) VALUES('$podcast_name', '$category', '$podcast_description', '$user','$imgContent','private','$id')");
        return $result;
    }
    public function create_playlist($playlist_name, $playlist_description, $user_id, $imgContent)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO media_playlist(playlist_name,playlist_description,user_id,images) VALUES('$playlist_name', '$playlist_description', '$user_id', '$imgContent')");
        return $result;
    }
    public function save_to_playlist($mid, $playlistId)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO media_playlist_files(media,playlist) VALUES('$mid', '$playlistId')");
        return $result;
    }
    public function track_list($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager pm Left JOIN media m ON(m.podcast_id = pm.id)WHERE pm.id = '$id'");
        return $result;
    }
    public function track_play_list($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT m.* , mp.* ,pm. * FROM media m , media_playlist mp ,podcast_manager pm WHERE m.id IN (SELECT media FROM media_playlist_files WHERE playlist = '$id') AND mp.id IN (SELECT playlist FROM media_playlist_files WHERE playlist = '$id') AND m.podcast_id = pm.id");
        return $result;
    }
    public function viewpodcast($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE id = '$id'");
        return $result;
    }
    public function view_playlist($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM media_playlist WHERE id = '$id'");
        return $result;
    }
    public function episodeplaylist($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT m.* , mp. * FROM media m , media_playlist mp WHERE m.id IN (SELECT media FROM media_playlist_files WHERE playlist = '$id') AND mp.id IN (SELECT playlist FROM media_playlist_files WHERE playlist = '$id') ");
        return $result;
    }
    public function episodepodcast($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT m.*, pm.* FROM media m, podcast_manager pm WHERE m.podcast_id = '$id' AND pm.id = '$id' ");
        return $result;
    }
    public function manage_episode($id, $text_search)
    {
        // $result = mysqli_query($this->dbcon, "SELECT m.*, pm.* FROM media m, podcast_manager pm WHERE m.podcast_id = '$id' AND pm.id = '$id' AND m.title LIKE '%" . $text_search . "%'");
        $result = mysqli_query($this->dbcon, "SELECT * FROM media WHERE podcast_id  = '$id' AND title LIKE '%" . $text_search . "%'");
        return $result;
    }
    public function media($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT id FROM media WHERE podcast_id  = '$id'");
        return $result;
    }
    public function newpodcast($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE status = 'public' AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC LIMIT 6");
        return $result;
    }
    public function newpodcast_all($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE status = 'public' AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC LIMIT 30");
        return $result;
    }
    public function news($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'ข่าวสารและการเมือง' AND status = 'public'AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC LIMIT 6");
        return $result;
    }
    public function playlist($id, $text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM media_playlist WHERE user_id = '$id'AND playlist_name LIKE '%" . $text_search . "%' LIMIT 6");
        return $result;
    }
    public function playlist_all($id, $text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM media_playlist WHERE user_id = '$id'AND playlist_name LIKE '%" . $text_search . "%'");
        return $result;
    }
    public function news_all($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'ข่าวและการเมือง' AND status = 'public'AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC");
        return $result;
    }
    public function education($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'การศึกษา' AND status = 'public'AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC LIMIT 6");
        return $result;
    }
    public function education_all($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'การศึกษา' AND status = 'public'AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC");
        return $result;
    }
    public function sport($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'กีฬาและนันทนาการ' AND status = 'public'AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC LIMIT 6");
        return $result;
    }
    public function sport_all($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'กีฬาและนันทนาการ' AND status = 'public'AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC");
        return $result;
    }
    public function technology($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'ธุรกิจและเทคโนโลยี' AND status = 'public'AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC LIMIT 6");
        return $result;
    }
    public function technology_all($text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE category = 'ธุรกิจและเทคโนโลยี' AND status = 'public' AND podcast_name LIKE '%" . $text_search . "%' ORDER BY id DESC");
        return $result;
    }
    public function my_podcast($id, $text_search)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE user_id = '$id' AND podcast_name LIKE '%" . $text_search . "%'");
        return $result;
    }
    public function fetchpodcast($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM podcast_manager WHERE id = '$id' ");
        return $result;
    }
    public function fetchmedia($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM media WHERE id = '$id' ");
        return $result;
    }
    public function update_ep($episode, $title, $description, $time, $id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE media SET
                episode = '$episode',
                title = '$title',
                ep_description = '$description',
                time = '$time'
                WHERE id = '$id'
            ");
        return $result;
    }
    public function update_podcast($podcast_name, $category, $podcast_description, $status, $id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE podcast_manager SET
                podcast_name = '$podcast_name',
                category = '$category',
                podcast_description = '$podcast_description',
                status = '$status'
                WHERE id = '$id'
            ");
        return $result;
    }
    public function delete_episode($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM media WHERE id = '$id'");
        return $deleterecord;
    }
    public function delete_podcast($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM podcast_manager WHERE id = '$id'");
        return $deleterecord;
    }
}
