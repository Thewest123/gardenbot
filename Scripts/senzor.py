import chirp
import time

# These values needs to be calibrated for the percentage to work!
# The highest and lowest value the individual sensor outputs.
min_moist = 240
max_moist = 790

# Initialize the sensor.
chirp = chirp.Chirp(address=0x20,
                    read_moist=True,
                    read_temp=True,
                    read_light=True,
                    min_moist=min_moist,
                    max_moist=max_moist,
                    temp_scale='celsius',
                    temp_offset=0)

try:
    print('Moisture  | Temp   | Brightness')
    print('-' * 31)
    while True:
        # Trigger the sensors and take measurements.
        chirp.trigger()
        output = '{:d} {:4.1f}% | {:3.1f}°C | {:d}'
        output = output.format(chirp.moist, chirp.moist_percent,
                               chirp.temp, chirp.light)
        print(output)
        time.sleep(1)
except KeyboardInterrupt:
    print('\nCtrl-C Pressed! Exiting.\n')
finally:
    print('Bye!')
