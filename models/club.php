<?php
namespace TBI\Models;

class Club {
    public $id;
    public $title;
    public $bio;
    public $url;
    public $emblem;
    public $city;
    public $province;
    public $address;
    public $phone;
    public $email;
    public $website;
    public $is_inactive;

    public function __construct($id) {
        $club_post = get_post($id);
        $clubs_details = get_post_meta($club_post->ID, 'tbi-club-details', true) ?: [];

        $this->id = $club_post->ID;
        $this->title = $club_post->post_title;
        $this->bio = $club_post->post_content;
        $this->url = get_permalink($this->id);
        $this->city = $clubs_details['city'] ?: "";
        $this->province = $clubs_details['province'] ?: "";
        $this->address = $clubs_details['address'] ?: "";
        $this->phone = $clubs_details['phone'] ?: "";
        $this->email = $clubs_details['email'] ?: "";
        $this->website = $clubs_details['website'] ?: "";
        $this->is_inactive = $clubs_details['is_inactive'] ? true : false;
        $this->emblem = get_the_post_thumbnail_url($this->id, 'team-emblem');
    }
}