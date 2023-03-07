# Test Your Motorcycle Charging System

`Note: all provided values are generic. If you have values from a specification use them`

## Major electrical components

* Battery
* Alternator/Stator coil
* Regulator/Rectifier (reg/rec)
* The cables between them
* Fuses and switches

## Diagram

```
               ---- (connection to the fraim)
              /
(alternaotr)=
              \
               ---- (reg/rec) ---- (battery)
```
               
## Simptoms of bad charging system

* Motorcycle won’t start - turns over super slowly or just “clicks”
* Spluttering as you drive
* Lights light up and dim as you rev
* Battery warning light comes on

## Test Procedure

### Battery

1. Charge the battery. Leave it for 15 min and after this check the voltage. After 24 hours the reading should be similar (if the battery is not used).
   * < 12.2V - better to change the battery
   * \> 12.2V and < 12.4V - battery can start the bike but is near the end of it's life
   * \>= 12.4V - battery is perfect
2. Start the bike and test the voltage (best after the bike is at normal working temperature)
   * on idle between 12V and 13V
   * at 3K rpm between 13V and 15V

### Alternator/Stator coil

1. Check the resistance between each of the pins - measuremes should be 0.2 - 0.5 ohms
2. Check the resistance between the pins and earth - should have no connectivity
3. Check the produced voltage between all pins while the bike is working (best after the bike is at normal working temperature). At 3K rpm the voltage shoudl 
   be \>= 15V
4. No way to measure Amps, so even everything above it OK the alternator/stator could still be faulty (very rear case)

### Regulator/Rectifier

1. Start the bike and test the voltage (best after the bike is at normal working temperature)
   * on idle between 12V and 13V
   * at 3K rpm between 13V and 15V
2. Test the poarity
   * set the multimeter to diode setting
   * identify the positive pins/wires on the output side (check the electric diagram)
   * connect the black probe to one of the positive pins/wires on the output side
   * connect the red probe to each pin on the source side
   * repeate the last steps to test all possible combinations - readings should be almost identical

