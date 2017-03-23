# APPDEV
Rasberry Pi acoustic sensor project

This project will return a raspberry Pi 3 into an acoustic sensor

1. Configuration

1.1 Hardware configuration

A raspberry PI 3 is recommended. If a older version of Pi is used
corresponding configuration might be changed

The Pi is mounted with a USB sound card, and plugged in a microphone

It is recommended to have Ethernet connection for your Pi.

1.2 Software configuration

The USB sound card has to be set as default audio devices. To do so,you need modify two files with following contents.
- Use `lsusb` command to check if your USB sound card is mounted 
- Use `sudo nano /etc/asound.conf` command and put following content to the file:
`pcm.!default {
	type plug
	slave {
		pcm "hw:1,0"
	}
}
ctl.!default {
	type hw
   	card 1
}`
- Go to your home directory. Use `nano .asoundrc` command and put the same content to the file.
- Now run `alsamixer` you should be able to see that USB sound card is the default audio device

If you are using Raspberry Jessie, you have to roll back alsa-utils to an earlier version.
- Use `sudo nano /etc/apt/sources.list` command and add the last line:

`deb http://mirrordirector.raspbian.org/raspbian/ wheezy main contrib non-free rpi` 
- Run `sudo apt-get update`
- Run `sudo aptitude versions alsa-utils` to check if version 1.0.25 of alsa-util is available 
- Run `sudo apt-get install alsa-utils=1.0.25-4` to downgrade and reboot (if necessary)
- Run `arecord -r44100 -c1 -f S16_LE -d5 test.wav` to test that your microphone is working. You should see a "test.wav" file in the current folder 
- Put earphone on. Run `aplay test.wav` to check that your recording is okay.

