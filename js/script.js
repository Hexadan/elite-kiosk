function validateCreateTask()
{
  var tname = document.forms['create-task']['taskName'].value;
  var sdesc = document.forms['create-task']['taskShortDesc'].value;
  var ldesc = document.forms['create-task']['taskLongDesc'].value;
  var ttype = document.forms['create-task']['taskType'].value;
  var tpriority = document.forms['create-task']['taskPriority'].value;
  var tstatus = document.forms['create-task']['taskStatus'].value;

  if((tname.length < 31) && (tname != ""))
  {
    if((sdesc.length < 51) && (sdesc != ""))
    {
      if((ldesc.length < 501) && (sdesc != ""))
      {
        if((ttype == "G") || (ttype == "P"))
        {
          if((!isNaN(tpriority)))
          {
            if((tpriority >= 0) && (tpriority < 201) && (tpriority != ""))
            {
              if((tstatus == 1) || (tstatus == 0))
              {
                return true;
              }
              else
              {
                alert("Task Status must be either Complete or Incomplete.")
                return false;
              }
            }
            else
            {
              alert("Task Priority must be a number between 0 and 200")
              return false;
            }
          }
          else
          {
            alert("Task Priority must be a number.")
            return false;
          }
        }
        else
        {
          alert("Task Type must be either (G)eneral or (P)riority.")
          return false;
        }
      }
      else
      {
        alert("Task Long Description must be 500 characters or less.")
        return false;
      }
    }
    else
    {
      alert("Task Short Description must be 50 characters or less.")
      return false;
    }
  }
  else
  {
    alert("Task Name must be 30 characters or less.")
    return false;
  }
}

function validateEditTask()
{
  var tname = document.forms['edit-task']['taskName'].value;
  var sdesc = document.forms['edit-task']['taskShortDesc'].value;
  var ldesc = document.forms['edit-task']['taskLongDesc'].value;
  var ttype = document.forms['edit-task']['taskType'].value;
  var tpriority = document.forms['edit-task']['taskPriority'].value;
  var tstatus = document.forms['edit-task']['taskStatus'].value;

  if((tname.length < 31) && (tname != ""))
  {
    if((sdesc.length < 51) && (sdesc != ""))
    {
      if((ldesc.length < 501) && (sdesc != ""))
      {
        if((ttype == "G") || (ttype == "P"))
        {
          if((!isNaN(tpriority)))
          {
            if((tpriority >= 0) && (tpriority < 201) && (tpriority != ""))
            {
              if((tstatus == 1) || (tstatus == 0))
              {
                return true;
              }
              else
              {
                alert("Task Status must be either Complete or Incomplete.")
                return false;
              }
            }
            else
            {
              alert("Task Priority must be a number between 0 and 200")
              return false;
            }
          }
          else
          {
            alert("Task Priority must be a number.")
            return false;
          }
        }
        else
        {
          alert("Task Type must be either (G)eneral or (P)riority.")
          return false;
        }
      }
      else
      {
        alert("Task Long Description must be 500 characters or less.")
        return false;
      }
    }
    else
    {
      alert("Task Short Description must be 50 characters or less.")
      return false;
    }
  }
  else
  {
    alert("Task Name must be 30 characters or less.")
    return false;
  }
}
