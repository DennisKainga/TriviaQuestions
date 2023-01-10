<?php
namespace App\Enum;

class Difficulty {
    const EASY = 'easy';
    const MEDIUM = 'medium';
    const HARD = 'hard';
    public  const levels = [self::EASY, self::MEDIUM, self::HARD];
}
?>