<?php


namespace App\DTO;


use App\Contracts\DTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SchoolDTO implements DTO
{
    public string $name;
    public string $email;
    public string $website;
    public string $logo;

    public ?UploadedFile $logoContent;


    public static function fromRequest(Request $request): self
    {
        $dto = new self;
        return $dto->setName($request->name)
            ->setEmail($request->email)
            ->setWebsite($request->website)
            ->setLogoContent($request->logo);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }


    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $website
     * @return self
     */
    public function setWebsite(string $website): self
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @param UploadedFile|null $logoContent
     * @return self
     */
    public function setLogoContent(?UploadedFile $logoContent): self
    {
        $this->logoContent = $logoContent;
        return $this;
    }

    public static function fromArray(array $array): self
    {
        // TODO: Implement fromArray() method.
    }


    /**
     * @param string|null $logo
     * @return self
     */
    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;
        return $this;
    }

    public static function fromModel(Model $school = null): self
    {
        // TODO: Implement fromModel() method.
    }
}
