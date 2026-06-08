<?php

const TEAMS_CONFIG_FILE = 'teams.json';
const MAX_TEAM_ID = 16;
const MAX_TEAM_NAME_LENGTH = 50;

function team_default_name(string $id): string
{
    return 'Team ' . $id;
}

function is_valid_team_id(string $id): bool
{
    return preg_match('/^(0[1-9]|1[0-6])$/', $id) === 1;
}

function load_teams_config(): array
{
    if (!file_exists(TEAMS_CONFIG_FILE)) {
        return [];
    }

    $data = json_decode(file_get_contents(TEAMS_CONFIG_FILE), true);
    return is_array($data) ? $data : [];
}

function save_teams_config(array $config): void
{
    file_put_contents(TEAMS_CONFIG_FILE, json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function get_team_name(string $id): string
{
    if (!is_valid_team_id($id)) {
        return team_default_name($id);
    }

    $name = trim(load_teams_config()[$id] ?? '');
    return $name !== '' ? $name : team_default_name($id);
}

function set_team_name(string $id, string $name): bool
{
    if (!is_valid_team_id($id)) {
        return false;
    }

    $name = trim($name);
    if ($name !== '' && strlen($name) > MAX_TEAM_NAME_LENGTH) {
        return false;
    }

    $config = load_teams_config();

    if ($name === '' || $name === team_default_name($id)) {
        unset($config[$id]);
    } else {
        $config[$id] = $name;
    }

    save_teams_config($config);
    return true;
}

function get_all_teams(): array
{
    $config = load_teams_config();
    $teams = [];

    for ($i = 1; $i <= MAX_TEAM_ID; $i++) {
        $id = str_pad($i, 2, '0', STR_PAD_LEFT);
        $customName = trim($config[$id] ?? '');
        $defaultName = team_default_name($id);

        $teams[] = [
            'id' => $id,
            'name' => $customName !== '' ? $customName : $defaultName,
            'default_name' => $defaultName,
            'is_custom' => $customName !== '',
            'configured' => file_exists('sounds/team_' . $id . '.mp3'),
        ];
    }

    return $teams;
}

function get_team_names_map(): array
{
    $names = [];
    for ($i = 1; $i <= MAX_TEAM_ID; $i++) {
        $id = str_pad($i, 2, '0', STR_PAD_LEFT);
        $names[$id] = get_team_name($id);
    }
    return $names;
}
