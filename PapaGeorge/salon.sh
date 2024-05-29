#!/bin/bash
echo -e "\n~~~~~ MY SALON ~~~~~"
psql="psql --username=freecodecamp --dbname=salon --tuples-only -c "
getServices=$($psql "select service_id, name from services order by service_id");
mainMenu(){
  
  if [[ $1 ]]
  then
    echo -e "\n$1"
  else
    echo -e "\nWelcome to My Salon, how can I help you?\n"
  fi
  
  
  echo "$getServices" | while read serviceId BAR serviceName
  do
    echo -e "$serviceId) $serviceName"   
  done

  read SERVICE_ID_SELECTED
  case $SERVICE_ID_SELECTED in
    1) customerInfo ;;
    2) customerInfo ;;
    3) customerInfo ;;
    4) customerInfo ;;
    5) customerInfo ;;
    6) customerInfo ;;
    *) mainMenu "I could not find that service. What would you like today?"
  esac
  
}

customerInfo(){
  echo $SERVICE_ID_SELECTED
  serviceName=$($psql "select name from services where service_id = $SERVICE_ID_SELECTED")
  echo -e "\nWhat's your phone number?"
  # SERVICE_ID_SELECTED, CUSTOMER_PHONE, CUSTOMER_NAME, and SERVICE_TIME
  read CUSTOMER_PHONE
  checkPhone=$($psql "select name, phone from customers where phone = '$CUSTOMER_PHONE'")  
  if [[ -z $checkPhone ]]
  then
    echo -e "\nI don't have a record for that phone number, what's your name?"
    read CUSTOMER_NAME
    insertName=$($psql "insert into customers(name, phone)values('$CUSTOMER_NAME','$CUSTOMER_PHONE')")
    echo -e "\nWhat time would you like your$serviceName, $CUSTOMER_NAME?"
    read SERVICE_TIME 
    CUSTOMER_ID=$($psql "select customer_id from customers where phone = '$CUSTOMER_PHONE'")
    insertAppointment=$($psql "insert into appointments(time,customer_id, service_id)values('$SERVICE_TIME',$CUSTOMER_ID,$SERVICE_ID_SELECTED)")
    # echo $insertAppointment
    if [[ $insertAppointment = 'INSERT 0 1' ]]
    then
      # echo -e "\nI have put you down for a$serviceName at $SERVICE_TIME, $CUSTOMER_NAME"
      echo -e "\nI have put you down for a $serviceName at $SERVICE_TIME, $CUSTOMER_NAME."
      
    fi    
    
  else
  echo "$checkPhone" | while read CUSTOMER_NAME BAR CUSTOMER_PHONE
  do        
    echo -e "\nWhat time would you like your$serviceName, $CUSTOMER_NAME?"    
    # echo -e "\nI have put you down for a$serviceName at $appTime, $name."
  done
  cName=$($psql "select customer_id, name, phone from customers where phone = '$CUSTOMER_PHONE'")
  read _TIME
  echo "$cName" | while read CUSTOMER_ID BAR NAME BAR PHONE
  do
    echo -e "\nI have put you down for a$serviceName at $_TIME, $NAME."
  
  insertAppointment=$($psql "insert into appointments(time,customer_id, service_id)values('$_TIME',$CUSTOMER_ID,$SERVICE_ID_SELECTED)")
  done
  fi
  
}


mainMenu
