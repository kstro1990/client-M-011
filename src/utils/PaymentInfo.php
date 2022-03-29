<?php
class BillInfo
{
    private string $reference;
    private string $description;
    private string $debtorID;
    private string $debtorFirstName;
    private string $debtorLastName;
    private string $debtorCode;
    private $totalCharges;
    private $totalInterest;
    private $totalAmount;
    private string $creationDate;

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getReference()
    {
        return $this->reference;
    }

    //SET
    public function setDescription($description)
    {
        $this->description = $description;
    }

    //GET
    public function getDescription()
    {
        return $this->description;
    }

    public function setDebtorID($debtorID)
    {
        $this->debtorID = $debtorID;
    }

    public function getDebtorID()
    {
        return $this->debtorID;
    }

    public function setDebtorFirstName($debtorFirstName)
    {
        $this->debtorFirstName = $debtorFirstName;
    }

    public function getDebtorFirstName()
    {
        return $this->debtorFirstName;
    }

    public function setDebtorLastName($debtorLastName)
    {
        $this->debtorLastName = $debtorLastName;
    }

    public function getDebtorLastName()
    {
        return $this->debtorLastName;
    }

    public function setDebtorCode($debtorCode)
    {
        $this->debtorCode = $debtorCode;
    }

    public function getDebtorCode()
    {
        return $this->debtorCode;
    }

    public function setTotalCharges($totalCharges)
    {
        $this->totalCharges = $totalCharges;
    }

    public function getTotalCharges()
    {
        return (float) $this->totalCharges;
    }

    public function setTotalInterest($totalInterest)
    {
        $this->totalInterest = $totalInterest;
    }

    public function getTotalInterest()
    {
        return $this->totalInterest;
    }

    public function settotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    public function gettotalAmount()
    {
        return $this->totalAmount;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function objBillInfo()
    {
        $BillInfo = [
            'reference' => $this->reference,
            'description' => $this->description,
            'debtorID' => $this->debtorID,
            'debtorFirstName' => $this->debtorFirstName,
            'debtorLastName' => $this->debtorLastName,
            'debtorCode' => $this->debtorCode,
            'totalCharges' => $this->totalCharges,
            'totalInterest' => $this->totalInterest,
            'totalAmount' => $this->totalAmount,
            'creationDate' => $this->creationDate,
        ];
        return $BillInfo;
    }
}

$bill = new BillInfo();
$bill->setReference('reiuer823');
$bill->setDescription('descript');
$bill->setDebtorID('234234');
$bill->setDebtorFirstName('luis');
$bill->setDebtorLastName('castro');
$bill->setDebtorCode('2342');
$bill->setTotalCharges(123.99);
$bill->setTotalInterest(234);
$bill->settotalAmount(0);
$bill->setCreationDate('');

var_dump($bill->objBillInfo());
