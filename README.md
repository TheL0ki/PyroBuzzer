# PyroBuzzer

A 16-team quiz buzzer system for Raspberry Pi. Physical buzzer buttons are read over I2C, press order is recorded in real time, and a web UI shows the live ranking with optional per-team sounds.

## What it does

PyroBuzzer runs a competitive “first to buzz in” round:

1. **`buzzer.py`** polls up to 16 buzzer inputs and detects button presses.
2. On each new press, it appends a JSON entry to `ranking.txt` with rank, team number, display name, and timestamp.
3. Each team can only register once per round; later presses from the same seat are ignored.
4. The **web UI** (`index.php`) polls the ranking and shows who buzzed in first, with time deltas relative to the winner.
5. **Start** archives the current round to `history/` and begins a fresh ranking. **Stop** creates a `stop-script` file so `buzzer.py` stops accepting new presses until the next start.
6. Team display names are configured in `teams.json`. Optional MP3 files in `sounds/` (`team_01.mp3` … `team_16.mp3`) play when a team buzzes in.

## Required hardware

| Component | Details |
|-----------|---------|
| **Raspberry Pi** | Host for both the Python listener and the PHP web app. Tested with the standard 40-pin GPIO header and I2C enabled. |
| **I2C GPIO expander** | MCP23017 (or compatible) on I2C bus 1 at address **0x20**. Registers used: `GPIOA` (0x12), `GPIOB` (0x13). |
| **16 buzzer buttons** | Wired to the expander as **active-low** inputs (pressed = logic 0). Buttons **1–8** on port B, **9–16** on port A. |
| **Network / display** | A browser on the same machine or LAN to open the web UI (e.g. via Apache/nginx serving `/var/www/PyroBuzzer`). |

### Wiring notes

- Enable I2C on the Pi (`raspi-config` → Interface Options → I2C).
- All expander pins are configured as inputs with internal pull-ups (`IODIRA` / `IODIRB` set to `0xFF`).
- Buttons should tie a pin to ground when pressed.

## Software requirements

**On the Raspberry Pi (production):**

- Python 3 with `RPi.GPIO` and `smbus` (e.g. `python3-rpi.gpio`, `python3-smbus`)
- PHP and a web server
- [Composer](https://getcomposer.org/) dependencies: `composer install`
- Deploy the project to `/var/www/PyroBuzzer/` (paths used by `buzzer.py` in production mode)
- Run `buzzer.py` as a persistent service or background process

**For local development (no hardware):**

```bash
python buzzer.py --dev
python simulate_press.py 3   # simulate team 3 buzzing in
```

Dev mode uses files in the project directory instead of `/var/www/PyroBuzzer/`. Set `PYROBUZZER_DEV=1` instead of `--dev` if you prefer an environment variable.

## Project layout

| Path | Role |
|------|------|
| `buzzer.py` | Button listener and ranking writer |
| `simulate_press.py` | Dev-mode button press simulator |
| `ranking.txt` | Current round (JSON lines, gitignored) |
| `teams.json` | Seat → display name mapping (gitignored) |
| `stop-script` | Present while the round is stopped |
| `sounds/` | Per-team buzzer audio (`team_XX.mp3`) |
| `history/` | Archived rankings from previous rounds |
| `index.php`, `start.php`, `stop.php`, … | Web UI and API endpoints |

## Quick start (Raspberry Pi)

1. Wire the MCP23017 and 16 buttons as described above.
2. Copy the project to `/var/www/PyroBuzzer/` and run `composer install`.
3. Create `teams.json` (see `teams.php` / settings UI) with entries like `"01": "Team Alpha"`.
4. Start the web server and open the UI in a browser.
5. Run `python3 /var/www/PyroBuzzer/buzzer.py`.
6. Click **Start** in the UI, then have teams buzz in.
